<template>
    <section class="control-panel uk-section">
        <div class="uk-container">
            <div class="uk-flex uk-flex-wrap uk-flex-between">
                <div class="uk-width-1-1 uk-width-1-4@m">
                    <aside
                        class="control-panel__sidebar"
                        aria-label="Sidebar"
                    >
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
                    </aside>

                    <nav
                        class="control-panel__navigation-mobile uk-nav-divider uk-hidden@m"
                        aria-label="Mobile navigation"
                    >
                        <div class="uk-parent">
                            <a
                                href="#"
                                class="control-panel__navigation-toggle"
                                aria-label="Toggle navigation"
                            >
                                <svg class="trigger__icon">
                                    <use :xlink:href="sprites + '#icon-menu'" />
                                </svg>
                            </a>

                            <ul class="control-panel__navigation-list uk-nav-sub">
                                <li
                                    v-for="item in links"
                                    :key="item.text"
                                    class="control-panel__list-item"
                                >
                                    <router-link 
                                        :to="item.path"
                                        class="control-panel__navigation-link"
                                        active-class="control-panel__link--active"
                                    >
                                        {{ item.text }}
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="uk-width-1-1 uk-width-2-3@m">
                    <router-view />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { nav } from 'uikit';
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
            // {
            //     id: 1,
            //     path: { name: 'list-video', params: { listVideoId: 'list-video' }},
            //     text: 'Видео'
            // },
            // {
            //     id: 2,
            //     path: { name: 'list-reviews', params: { listReviewsId: 'list-reviews' }},
            //     text: 'Отзывы'
            // },
        ];

        const store = useStore();
        const sprites = computed(() => store.getters.sprites);

        onMounted(() => {
            nav('.control-panel__navigation-mobile');
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
    }

    &__link {
        display: block;
        text-transform: uppercase;
        color: $greyColor;
        font-size: 20px;
        text-decoration: none;
        padding: 8px 16px;

        &:hover {
            color: $purpleSaturate;
        }

        &--active {
            color: $purpleSaturate;
        }
    }

    &__navigation {
        &-mobile {
            position: relative;
            padding-bottom: rem(20);

            &::after {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                background: #e5e5e5;
                top: 35px;
                left: 0;
            }
        }

        &-list {
            padding-top: rem(20);
        }

        &-link {
            font-size: 20px;
            text-transform: uppercase;
        }

        &-toggle {
            padding-left: rem(30);
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