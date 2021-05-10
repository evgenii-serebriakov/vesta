// import axios from 'axios';
import { _posts, _videos } from './data';

export const fetchData = (data) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(data);
        }, 1000);
    });
};

export const fetchPostApi = async (id) => {
    const posts = await fetchData(_posts);
    const post = posts.find((post) => post.id === id);

    return post;
};

export const fetchVideoApi = async (id) => {
    const videos = await fetchData(_videos);
    const video = videos.find((video) => video.id === id);

    return video;
};