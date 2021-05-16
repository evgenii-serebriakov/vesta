<template>
    <section class="control-panel uk-section">
        <div class="uk-container">
            <div class="uk-flex uk-flex-wrap uk-flex-between">
                <div class="uk-width-1-1 uk-width-1-4@m">
                    <ul class="control-panel__list uk-padding-remove-left uk-list uk-list-divider uk-visible@m">
                        <li
                            v-for="item in links"
                            :key="item.text"
                            class="control-panel__list-item"
                        >
                            <router-link 
                                :to="item.path"
                                class="control-panel__link"
                                active-class="control-panel__link--active"
                            >
                                {{ item.text }}
                            </router-link>
                        </li>
                    </ul>

                    <ul class="control-panel__list-mobile accordion uk-list-divider uk-hidden@m">
                        <li>
                            <a
                                class="uk-accordion-title"
                                href="#"
                            >   
                                <svg class="trigger__icon">
                                    <use :xlink:href="sprites + '#icon-menu'" />
                                </svg>
                            </a>

                            <div class="uk-accordion-content">
                                <ul class="control-panel__list uk-padding-remove-left uk-list uk-list-divider">
                                    <li
                                        v-for="item in links"
                                        :key="item.text"
                                        class="control-panel__list-item"
                                    >
                                        <router-link 
                                            :to="item.path"
                                            class="control-panel__link"
                                            active-class="control-panel__link--active"
                                        >
                                            {{ item.text }}
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="uk-width-1-1 uk-width-2-3@m">
                    <router-view />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { accordion } from 'uikit';
import { useStore } from 'vuex';
import { onMounted, computed } from 'vue';

export default {
    name: 'ControlPanel',
    setup() {
        const links = [
            {
                id: 0,
                path: { name: 'list-posts', params: { listPostId: 'list-posts' }},
                text: 'Посты'
            },
        ];

        const store = useStore();
        const sprites = computed(() => store.getters.sprites);

        onMounted(() => {
            const acc = accordion('.accordion');
            console.log(acc);
        });

        return {
            links,
            sprites
        };
    },
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.control-panel {
    background-image: radial-gradient(circle at 100% 50%, #f8f8f8 50%, rgba(150, 23, 23, 0) 0%);

    &__list {
        list-style: none;
        border-right: 1px solid #e5e5e5;

        &-mobile {
            position: relative;
            padding-bottom: rem(20);
            padding-left: rem(25);

            &::after {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                background: #e5e5e5;
                top: 38px;
                left: 0;
            }
        }
    }

    &__link {
        display: block;
        text-transform: uppercase;
        color: $greyColor;
        font-size: 20px;
        text-decoration: none;
        // padding: 8px 16px;

        &:hover {
            color: $purpleSaturate;
        }

        &--active {
            color: $purpleSaturate;
        }
    }

    .trigger {
        &__icon {
            width: 23px;
            height: 23px;
            fill: $purpleSaturate;

            &:hover {
                fill: $purpleColor100;
            }
        }
    }
}
</style>