<template lang="pug">

home-banner
home-video-preview
home-massage
home-post-preview

</template>

<script>
import HomeBanner from './HomeBanner';
import HomeMassage from './HomeMassage';
import HomePostPreview from './HomePostPreview';
import HomeVideoPreview from './HomeVideoPreview';

export default {
    name: 'HomePage',
    components: {
        HomeBanner,
        HomeMassage,
        HomePostPreview,
        HomeVideoPreview
    }
};
</script>
