module.exports = (grunt)->

    stringify = require 'stringify'
    coffeeify = require 'coffeeify'

    grunt.initConfig
        concurrent:
            dev:
                tasks: ["nodemon", "watch"]
                options:
                    logConcurrentOutput: true
        copy:
            dev:
                files: [
                    {expand: true, flatten: true, src: ["lib/js/*"], dest: 'dist/lib/js/'}
                    {expand: true, flatten: true, src: ["lib/css/*"], dest: 'dist/lib/css/'}
                ]

        clean:
            dist: ['dist']

        browserify:
            components:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                files: {
                    #'dist/js/components.js': ['src/components/**/*.coffee']
                    'dist/js/common.js': ['src/common/**/*.coffee']
                }

            pages:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                src: ['src/pages/**/*.coffee']
                dest: 'dist/js/pages/'
                ext: '.js'

            pc:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                src: ['src/pc/pages/*.coffee']
                dest: 'dist/pc/pages/'
                ext: '.js'

        watch:
            compile:
                options:
                    livereload: 1337
                files: ['src/**/*.less', 'src/**/*.coffee']
                tasks: ['browserify', 'less']
            mobile_min:
                options:
                    livereload: 1337
                files: ['dist/**/*.css','dist/**/*.js']
                tasks: ['cssmin', 'uglify']

        less:
            common:
                files:
                    'dist/css/common.css': ['src/common/*.less']
                    'dist/pc/css/common.css': ['src/pc/common/*.less']

            components:
                files:
                    'dist/css/components.css': ['src/components/**/*.less']
                    'dist/pc/css/components.css': ['src/pc/components/**/*.less']
            pages:
                files:
                    'dist/css//pages/login.css': ['src/pages/login/login.less']
                    'dist/css//pages/home.css': ['src/pages/index/home.less']
                    'dist/css//pages/goodDetails.css': ['src/pages/index/goodDetails.less']
                    'dist/css//pages/goodsList.css': ['src/pages/index/goodsList.less']
                    'dist/css//pages/userCenter.css': ['src/pages/index/userCenter.less']
                    #PC端样式
                    'dist/pc/css/pages/login.css': ['src/pc/pages/login.less']
                    'dist/pc/css/pages/home.css': ['src/pc/pages/home.less']
                    'dist/pc/css/pages/search.css': ['src/pc/pages/search.less']
                    'dist/pc/css/pages/topic.css': ['src/pc/pages/topic/topic.less']
                    'dist/pc/css/pages/subject.css': ['src/pc/pages/subject/subject.less']

        cssmin:
            mobile:
                files:[
                    {
                        expand: true,
                        cwd: 'dist/css',
                        src: ['*.css', '!*.min.css'],
                        dest: 'dist/css',
                        ext: '.css'
                    },
                    {
                        expand: true,
                        cwd: 'dist/css/pages',
                        src: ['*.css', '!*.min.css'],
                        dest: 'dist/css/pages',
                        ext: '.css'
                    }
                ]
            pc:
                files:[
                    {
                        expand: true,
                        cwd: 'dist/pc/css',
                        src: ['*.css', '!*.min.css'],
                        dest: 'dist/pc/css',
                        ext: '.css'
                    },
                    {
                        expand: true,
                        cwd: 'dist/pc/css/pages',
                        src: ['*.css', '!*.min.css'],
                        dest: 'dist/pc/css/pages',
                        ext: '.css'
                    }
                ]

        uglify:
            mobile:
                files:[
                    {
                        expand: true,
                        cwd: 'dist/js/',
                        src: '**/*.js',
                        dest: 'dist/js/'
                    }
                ]
            pc:
                files:[
                    {
                        expand: true,
                        cwd: 'dist/pc/pages',
                        src: '**/*.js',
                        dest: 'dist/pc/pages'
                    }
                ]

    grunt.loadNpmTasks 'grunt-browserify'
    grunt.loadNpmTasks 'grunt-contrib-less'
    grunt.loadNpmTasks 'grunt-contrib-copy'
    grunt.loadNpmTasks 'grunt-contrib-clean'
    grunt.loadNpmTasks 'grunt-contrib-watch'
    grunt.loadNpmTasks 'grunt-contrib-uglify'
    grunt.loadNpmTasks 'grunt-contrib-cssmin'
    grunt.loadNpmTasks 'grunt-contrib-less'

    grunt.registerTask 'default', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'uglify'
            'cssmin'
            'watch'
        ]

    grunt.registerTask 'prod', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'uglify'
            'cssmin'
        ]

