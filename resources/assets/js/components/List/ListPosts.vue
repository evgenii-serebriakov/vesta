<template>
    <div class="list-posts">
        <div class="link-form">
            <router-link 
                :to="{ name: 'form-post', params: {
                    postId: 'form-post' 
                }}"
                class="list-posts__link link-form__post uk-text-uppercase"
                active-class="list-post__link--active"
            >
                Создать пост
            </router-link>
        </div>

        <h3 class="list-posts__caption">
            {{ posts && posts.length !== 0 ? 'Список записей' : 'Список записей пуст' }}
        </h3>

        <ul
            v-if="posts && posts.length !== 0"
            class="list-posts__list uk-padding-remove-left"
        >
            <li
                v-for="item in posts"
                :key="item.id"
                class="list-posts__list-item"
            >
                <router-link 
                    :to="{ name: 'single-post', params: { id: item.id }}"
                    class="list-posts__link uk-text-uppercase"
                    active-class="list-posts__link--active"
                >
                    {{ item.title }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
import { useStore } from 'vuex';
import { 
    computed,
    watchEffect,
} from 'vue';

export default {
    name: 'ListPosts',
    setup() {
        const store = useStore();
        
        store.dispatch('fetchPosts');

        const posts = computed(() => store.getters.posts);

        watchEffect(() => {
            posts.value;
        });

        return {
            posts
        };
    }
};
</script>

<style lang="scss" scoped>
@import "@/scss/utils/_variables";

@import "@/scss/mixins/_media";

.list-posts {
    &__caption {
        text-transform: uppercase;
        font-size: 24px;
        color: $greyColor;
    }

    &__list {
        list-style: none;
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
}

.link-form {
    &__post {
        position: relative;
        margin-bottom: rem(10);
        font-size: 24px;
        color: black;
        padding: 0;

        &::after {
            position: absolute;
            content: '';
            width: 100%;
            height: 1px;
            background: #e5e5e5;
            top: 50px;
            left: 0;
        }
    }
}
</style>