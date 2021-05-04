const path = require('path');

const ENV = process.env.NODE_ENV;
const isEnvProduction = ENV !== 'development';
const isHmr = process.argv.includes('--hot');


const PATHS = {
    src: path.join(__dirname, '../resources/assets'),
    dist: path.join(__dirname, '../public/assets'),
    views: path.join(__dirname, '../resources/views')

}

module.exports = {
    PATHS,
    ENV,
    isEnvProduction,
    isHmr
}