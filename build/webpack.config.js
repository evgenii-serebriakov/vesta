const rules = require('./webpackRules');
const plugins = require('./webpackPlugins');

module.exports = {
    module: {
        rules,
    },
    plugins
}

