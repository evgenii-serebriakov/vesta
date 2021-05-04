/**
 * @param {String} path
 */
export const page = (path) => () => import(/* webpackChunkName: '' */  `@/js/${path}`);