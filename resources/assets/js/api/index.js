export const fetchData = async (url) => {
    const { data, status, statusText } = await window.axios.get(url);

    if (status >= 400 && statusText !== 'OK') {
        throw new Error('No posts found');
    }

    return data;
};

export const fetchPost = async (url) => await fetchData(url);

export const fetchVideo = async (url) => await fetchData(url);
