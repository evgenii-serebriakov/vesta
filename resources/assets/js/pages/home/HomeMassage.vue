<template lang="pug">
section.massage
    .uk-container
        .uk-flex.uk-flex-center(class="uk-flex-right@m")
            .uk-width-auto
                .massage__inner.uk-text-center
                    h2.massage__caption.white-line Расслабляющий массаж
                    p.masage__subtitle.uk-text-large.uk-margin-remove.uk-text-break Успокоит ваше тело и мысли
</template>

<script>
export default {
    name: 'HomeMassage',
    setup() {

        return {
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.massage {
    position: relative;
    background-image: url('/assets/images/massage_bg.jpg');
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