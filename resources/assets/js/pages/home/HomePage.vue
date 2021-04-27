<template lang="pug">

home-banner
home-post-preview
home-services
home-video-preview
home-massage

</template>

<script>
import HomeBanner from './HomeBanner';
import HomeMassage from './HomeMassage';
import HomePostPreview from './HomePostPreview';
import HomeVideoPreview from './HomeVideoPreview';
import HomeServices from './HomeServices';

export default {
    name: 'HomePage',
    components: {
        HomeBanner,
        HomeMassage,
        HomePostPreview,
        HomeVideoPreview,
        HomeServices
    }
};
</script>
