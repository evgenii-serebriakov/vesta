<template>
    <div
        class="alert-message"
    >
        <a
            class="alert-message__link uk-alert-close"
        />
        <p><slot /></p>
    </div>
</template>


<script>
import { onMounted } from 'vue';
import { alert, close } from 'uikit';

export default {
    name: 'Alert',
    props: {
        color: {
            type: String,
            default: ''
        }
    },
    setup() {

        onMounted(() => {
            const popupMessage = alert('.alert-message');
            close('.alert-message__link');

            setTimeout(() => popupMessage.close(), 1000);
        });
        
    }
};
</script>

<style lang="scss" scoped>
.alert-message {
    display: inline-block;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    position: fixed;
    padding-right: 50px;
    z-index: 1000;
    margin: 0;
    // background-color: rgba(237, 251, 246, 0.8);
}
</style>