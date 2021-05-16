<template>
    <alert
        v-if="replyMessage"
        class="uk-alert-success"
    >
        {{ replyMessage }}
    </alert>

    <form
        class="form-post"
        @submit.prevent="submitPost"
        @closed="v$.$reset()"
    >
        <fieldset class="form-post__field-group uk-fieldset">
            <legend class="form-post__caption uk-legend">
                Добавить пост
            </legend>

            <div class="form-post__field input uk-margin">
                <input
                    v-model.trim="form.title"
                    class="uk-input input__text"
                    type="text"
                    placeholder="Заголовок"
                    @blur="v$.title.$touch"
                >
                <span
                    v-if="v$.title.$error"
                    class="input__error"
                >
                    {{ v$.title.$errors[0].$message }}
                </span>
            </div>

            <div class="form-post__message input uk-margin">
                <textarea
                    v-model.trim="form.message"
                    class="uk-textarea input__message"
                    rows="5"
                    placeholder="Описание"
                    @blur="v$.message.$touch"
                />
                <span
                    v-if="v$.message.$error"
                    class="input__error"
                >
                    {{ v$.message.$errors[0].$message }}
                </span>
            </div>

            <div
                v-show="form.imageUrl"
                class="form-post__image uk-margin"
            >
                <img
                    :src="form.imageUrl"
                    :alt="form.alt"
                >
            </div>

            <div class="form-post__field input uk-margin">
                <input
                    v-model.trim="form.alt"
                    class="uk-input input__text"
                    type="text"
                    placeholder="Текст для изображения"
                >
            </div>

            <div class="form-post__file uk-margin">
                <div class="form-post__custom-file">
                    <input
                        type="file"
                        accept="image/*"
                        @change="onImageSelected"
                    >
                    <button
                        class="form-post__btn uk-button uk-button-default"
                        type="button"
                        tabindex="-1"
                    >
                        Добавить изображение
                    </button>
                </div>
            </div>

            <div class="form-post__button uk-margin">
                <button
                    :disabled="loading"
                    class="form-post__btn uk-button uk-button-default uk-position-relative"
                    type="submit"
                >
                    <span>Отправить</span>
                    <spinner
                        v-if="loading"
                        class="spinner"
                        :ratio="0.6"
                    />
                </button>
            </div>
        </fieldset>
    </form>
</template>

<script>
import { reactive, onMounted, ref } from 'vue';
import { formCustom, alert, close } from 'uikit';
import { useVuelidate } from '@vuelidate/core';
import { readFileText } from '@/js/utils';
import { rulesPost } from './rules';

import Spinner from '@/js/components/Spinner';
import Alert from '@/js/components/Alert';

export default {
    name: 'FormPost',
    components: {
        Spinner,
        Alert
    },
    setup() {
        const loading = ref(false);
        const replyMessage = ref('');
        const form = reactive({
            title: '',
            message: '',
            imageFile: '',
            imageUrl: '',
            alt: ''
        });

        const v$ = useVuelidate(rulesPost, form);

        const submitPost = async () => {
            loading.value = true;

            const isValid = await v$.value.$validate();

            if (!isValid) {
                loading.value = false;
                return;
            }

            const dataForm = new FormData();
            dataForm.append('title', form.title);
            dataForm.append('message', form.message);
            dataForm.append('image', form.imageFile);
            dataForm.append('alt', form.alt);

            try {
                const { data } = await window.axios.post('/api/posts', dataForm, {
                    headers: {
                        'Content-type': 'application/json'
                    }
                });

                replyMessage.value = data.message;
            } catch (err) {
                console.log(err);
            } finally {
                loading.value = false;

                for (let field in form) {

                    form[field] = '';

                }

                v$.value.$reset();
            }
        };

        const onImageSelected = async (e) => {
            const files = e.target.files;

            if (files.length === 0) {

                form.imageFile = '';
                form.imageUrl = '';

                return;
            }

            form.imageUrl = await readFileText(form.imageFile = files[0]);
        };

        onMounted(() => {
            alert('.alert-message');
            close('.alert-message__link');
            formCustom('.form-post__custom-file');
        });

        return { 
            form,
            v$,
            submitPost,
            onImageSelected,
            loading,
            replyMessage
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.form-post {
    &__caption {
        font-size: 28px;
        text-transform: uppercase;
    }

    &__message {
        height: 400px;
        margin-bottom: rem(45);
    }

    &__custom-file {
        cursor: pointer;
    }
}

.input {
    &__message {
        height: 100%;
    }

    &__error {
        color: rgb(255, 105, 105);
    }
}

.spinner {
    top: 9px;
    left: 117px;
    position: absolute;
    width: 18px;
    height: 18px;
    z-index: 0;
}

</style>