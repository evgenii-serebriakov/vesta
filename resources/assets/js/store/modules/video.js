export const state = {
    video: {
        video: 'https://www.youtube.com/embed/TwXilp2mUtE',
        image: '/assets/images/video_0.jpeg',
        alt: 'bg-1',
        date: 'Март 06 2021',
        title: 'Ipsum video',
        message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
    },
    videos: [
        {   video: 'https://www.youtube.com/embed/TwXilp2mUtE',
            image: '/assets/images/video_0.jpeg',
            alt: 'bg-1',
            date: 'Март 06 2021',
            title: 'Ipsum dolor video',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
        {   video: 'https://www.youtube.com/embed/TwXilp2mUtE',
            image: '/assets/images/video_1.jpeg',
            alt: 'bg-2',
            date: 'Февраль 14 2021',
            title: 'Ipsum dolor',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
        {   video: 'https://www.youtube.com/embed/TwXilp2mUtE',
            image: '/assets/images/video_2.jpeg',
            alt: 'bg-3',
            date: 'Декабрь 10 2020',
            title: 'Ipsum dolor',
            message: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing...'
        },
    ]
};

export const getters = {
    video: (store) => store.video,
    videos: (store) => store.videos
};