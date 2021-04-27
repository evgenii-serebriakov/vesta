<template lang="pug">
section.services-top
    .uk-container
        .uk-flex.uk-flex-wrap
            .uk-width-1-1(class="uk-width-1-2@m")
                .services-top__image
                    img(src="assets/images/spirit_2.jpeg", alt="alt") 
            .uk-width-1-1(class="uk-width-1-2@m")
                .services-top__inner.uk-padding
                    h2.services-top__caption.uk-text-bold.uk-text-uppercase Духовные практики
                    ul.services-top__list.uk-list.uk-list-hyphen
                        li.services-top__list-item 
                            span.services-top__text Lorem ipsum dolor
                        li.services-top__list-item 
                            span.services-top__text Lorem ipsum dolor sit amet ipsum dolor
                        li.services-top__list-item 
                            span.services-top__text Lorem ipsum dolor sit amet
                        li.services-top__list-item 
                            span.services-top__text Lorem ipsum dolor sit amet ipsum dolor sit amet
                        li.services-top__list-item 
                            span.services-top__text Lorem ipsum dolor sit amet


section.services-bottom
    .uk-container
        .uk-flex.uk-flex-wrap
            .uk-width-1-1.uk-flex-last(class="uk-width-1-2@m uk-flex-first@m")
                .services-bottom__inner.uk-padding
                    h2.services-bottom__caption.uk-text-bold.uk-text-uppercase Центр реабилитации
                    ul.services-bottom__list.uk-list.uk-list-hyphen
                        li.services-bottom__list-item 
                            span.services-bottom__text Lorem ipsum dolor
                        li.services-bottom__list-item 
                            span.services-bottom__text Lorem ipsum dolor sit amet ipsum dolor
                        li.services-bottom__list-item 
                            span.services-bottom__text Lorem ipsum dolor sit amet
                        li.services-bottom__list-item 
                            span.services-bottom__text Lorem ipsum dolor sit amet ipsum dolor sit amet
                        li.services-bottom__list-item 
                            span.services-bottom__text Lorem ipsum dolor sit amet

            .uk-width-1-1(class="uk-width-1-2@m")
                .services-bottom__image
                    img(src="assets/images/table_bg.jpeg", alt="alt") 
            
</template>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.services-top,
.services-bottom {
    &__caption {
        color: $greyColor;
    }

    &__text {
        font-size: 24px;
    }
}
</style>