const path = require('path');

module.exports = {
    resolve: {
        extensions: ['*', '.mjs', '.js', '.json'],
        alias: {
            '@': path.resolve('resources/js')
        },
    },
    module: {
        rules: [
        {
            test: /\.mjs$/,
            include: /node_modules/,
            type: 'javascript/auto'
        }
        ]
    }
};
