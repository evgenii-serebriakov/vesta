/**
 * @param {String} path
 */
export function page (path) {
    return () => import(/* webpackChunkName: '' */ `@/js/${path}`);
}