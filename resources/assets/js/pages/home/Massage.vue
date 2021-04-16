<template lang="pug">
section.massage
    v-container(fluid)
        v-row(justify="end")
            v-col(cols="auto")
                .massage__inner.text-center
                    h2.massage__caption Душевное спокойствие
                    p.masage__subtitle.mb-0.pt-2.text-h6.text-wrap это состояние гармонии со своим телом

            //- v-col(cols="12" md="4" v-for="item in images" :key="item.alt")
                //- v-card
                //-     v-img(
                //-         :alt="item.alt"
                //-         :aspect-ratio="16/9"
                //-         :lazy-src="item.path"
                //-         height="125"
                //-     )

                //-     v-card-title
                //-         h1 {{ item.title }}
                //-     v-card-text {{ item.text }}




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
    padding: rem(100) 0;

    @include media-laptop {
        padding: rem(200) 0;
    }

    // &::before {
    //     top: 0;
    //     left: 0;
    //     position: absolute;
    //     display: block;
    //     content: ' ';
    //     background-color: rgba(243, 79, 229, 0.322);
    //     width: 100%;
    //     height: 100%;
    // }

    &__inner {
        color: white;
        text-transform: uppercase;
    }

    &__caption {
        font-size: rem(35);
    }
}
</style>