import * as types from '../mutation-types';

export const state = {
    post: {
        image: '/assets/images/massage_0.jpg',
        alt: 'bg-1',
        date: 'Март 06 2021',
        title: 'Lorem, ipsum dolor',
        message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos , obcaecati dolor sit amet consectetur adipisicing , obcaecati dolor sit amet consectetur adipisicing , obcaecati dolor sit amet consectetur adipisicing , obcaecati dolor sit amet consectetur adipisicing'
    },
    posts: [
        {
            image: '/assets/images/massage_0.jpg',
            alt: 'bg-1',
            date: 'Март 06 2021',
            title: 'Lorem, ipsum dolor',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
        {
            image: '/assets/images/massage_1.jpeg',
            alt: 'bg-2',
            date: 'Февраль 14 2021',
            title: 'Lorem, ipsum dolor',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
        {
            image: '/assets/images/post_1.jpeg',
            alt: 'bg-3',
            date: 'Декабрь 10 2020',
            title: 'Lorem, ipsum dolor',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
    ]
};

export const getters = {
    post: (store) => store.post,
    posts: (store) => store.posts
};

export const mutations = {
    [types.FETCH_POSTS_SUCCESS] (state, { posts }) {
        state.posts = posts;
    }, 
    [types.FETCH_POST_SUCCESS] (state, { post }) {
        state.post = post;
    } 
};

export const actions = {
    async fetchPosts (conmessage) {
        console.log(conmessage);
        // const { commit } = conmessage;

        // try {
        //     const { posts } = await axios.get('/api/posts');
      
        //     commit(types.FETCH_POSTS_SUCCESS, { posts });
        // } catch (e) {
        //     commit(types.FETCH_POSTS__FAILURE);
        // }
    }
};