<template lang="pug">
section.massage
    v-container(fluid)
        v-row(justify="center" justify-lg="end")
            v-col(cols="auto")
                .massage__inner.text-center
                    h2.massage__caption.white-line Расслабляющий массаж
                    p.masage__subtitle.mb-0.pt-2.text-h5.text-wrap Успокоит ваше тело и мысли
</template>

<script>
export default {
    setup() {

        const images = [
            {
                path: '/assets/images/jpg/massage_0.jpg',
                alt: 'bg-1',
                title: 'Lorem, ipsum dolor',
                text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
            },
            {
                path: '/assets/images/jpg/massage_1.jpg',
                alt: 'bg-2',
                title: 'Lorem, ipsum dolor',
                text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
            },
            {
                path: '/assets/images/jpg/massage_2.jpg',
                alt: 'bg-3',
                title: 'Lorem, ipsum dolor',
                text: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati!'
            },
        ];

        return {
            images
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.massage {
    position: relative;
    background-image: url('/assets/images/jpg/massage_bg.jpg');
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
        position: relative;
        font-size: rem(45);

        &::before {
            top: 60px;
        }
    }
}
</style>