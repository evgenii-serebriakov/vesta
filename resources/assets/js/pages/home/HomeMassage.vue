<template>
    <section class="massage">
        <div class="uk-container">
            <div class="uk-flex uk-flex-center uk-flex-right@m">
                <div class="uk-width-auto">
                    <div class="massage__inner uk-text-center">
                        <h2 class="massage__caption white-line">
                            асслабляющий массаж
                        </h2>
                        <p class="masage__subtitle uk-text-large uk-margin-remove uk-text-break">
                            Успокоит ваше тело и мысли
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { onMounted } from "vue";
import { scrollspy } from "uikit";

export default {
    name: "HomeMassage",
    setup() {
        onMounted(() => {
            scrollspy(".massage__inner", {
                cls: "uk-animation-slide-bottom-medium",
            });
        });

        return {};
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.massage {
    position: relative;
    background-image: url("/assets/images/massage_bg.jpg");
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    padding: rem(100) 0;

    @include media-laptop {
        padding: rem(200) 0;
    }

    &__inner {
        color: white;
        text-transform: uppercase;
    }

    &__caption {
        font-size: rem(45);
        position: relative;
        color: white;

        &::before {
            top: 60px;
        }
    }
}
</style>