import { truncate } from 'lodash';

/**
 * @param {String} path
 */
export const page = (path) => () => import(/* webpackChunkName: '' */  `@/js/${path}`);


/**
 * @param {Object} file 
 */
export function readFileText(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = () => resolve(reader.result);

        reader.onerror = () => reject(new Error(reader.error));

        reader.readAsDataURL(file);
    });
}

/**
 * @param {String} path
 */
export const isImage = (path) => /\/storage\/images\/(.+)/.test(path);

/**
 * @param {String} date 
 */
export const getDate = (date) => {
    const options = {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    };

    return new Date(date).toLocaleDateString('ru-RU', options);
};

export const shortenSrt = (message) => truncate(
    message, {
        'length': 48,
        'omission': '...'
    }
);