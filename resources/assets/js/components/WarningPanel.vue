<template lang="pug">
section.warning(
    role="dialog"
    aria-live="polite"
    aria-label="cookieconsent"
    aria-describedby="cookieconsent:desc"
)
    .uk-container
        .uk-flex.uk-flex-wrap.uk-flex-between.uk-flex-middle
            .uk-width-auto
                p Этот сайт использует файлы cookies для более комфортной работы пользователя. Продолжая просмотр страниц сайта, вы соглашаетесь с использованием файлов cookies. 
                    a(
                        aria-label="learn more about cookies"
                        role="button"
                        tabindex="0"
                        target="_blank"
                        href="/ru/confidential/#cookies"
                    ) Подробнее

            .uk-width-auto
                button(type="button" aria-label="dismiss cookie message") Понятно
</template>

<script>
export default {
    name: 'WarningPanel'
};
</script>