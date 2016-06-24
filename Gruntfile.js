/*global module:false*/
module.exports = function (grunt) {
    grunt.initConfig({
        less: {
            admin: {
                options: {
                    cleancss: false
                },
                src: [
                    'assets/less/admin.less'
                ],
                dest: 'plugin/plugin-name/assets/css/admin.css'
            },
            admin_min: {
                options: {
                    cleancss: true,
                    compress: true
                },
                src: [
                    'assets/less/admin.less'
                ],
                dest: 'plugin/plugin-name/assets/css/admin.min.css'
            },
            styles: {
                options: {
                    cleancss: false
                },
                src: [
                    'assets/less/style.less'
                ],
                dest: 'plugin/plugin-name/assets/css/styles.css'
            },
            styles_min: {
                options: {
                    cleancss: true,
                    compress: true
                },
                src: [
                    'assets/less/style.less'
                ],
                dest: 'plugin/plugin-name/assets/css/styles.min.css'
            }
        },
        uglify: {
            admin: {
                options: {
                    beautify: true
                },
                src: [
                    'assets/js/admin.js'
                ],
                dest: 'plugin/plugin-name/assets/js/admin.js'
            },
            admin_min: {
                src: [
                    'assets/js/admin.js'
                ],
                dest: 'plugin/plugin-name/assets/js/admin.min.js'
            },
            scripts: {
                options: {
                    beautify: true
                },
                src: [
                    'assets/js/scripts.js'
                ],
                dest: 'plugin/plugin-name/assets/js/scripts.js'
            },
            scripts_min: {
                src: [
                    'assets/js/scripts.js'
                ],
                dest: 'plugin/plugin-name/assets/js/scripts.min.js'
            }
        },
        autoprefixer: {
            options: {
                browsers: [
                    'Android 2.3',
                    'Android >= 4',
                    'Chrome >= 20',
                    'Firefox >= 24',
                    'Explorer >= 8',
                    'iOS >= 6',
                    'Opera >= 12',
                    'Safari >= 6'
                ]
            },
            min: {
                options: {
                    cascade: false
                },
                expand: true,
                flatten: true,
                src: 'assets/css/*.css',
                dest: 'assets/css/'
            }
        },
        checktextdomain: {
            standard: {
                options:{
                    text_domain: 'plugin-name', //Specify allowed domain(s)
                    keywords: [ //List keyword specifications
                        '__:1,2d',
                        '_e:1,2d',
                        '_x:1,2c,3d',
                        'esc_html__:1,2d',
                        'esc_html_e:1,2d',
                        'esc_html_x:1,2c,3d',
                        'esc_attr__:1,2d',
                        'esc_attr_e:1,2d',
                        'esc_attr_x:1,2c,3d',
                        '_ex:1,2c,3d',
                        '_n:1,2,4d',
                        '_nx:1,2,4c,5d',
                        '_n_noop:1,2,3d',
                        '_nx_noop:1,2,3c,4d'
                    ]
                },
                files: [{
                    src: ['plugin/plugin-name/**/*.php'], //all php
                    expand: true
                }]
            }
        },
        watch: {
            less: {
                files: 'assets/**/*.less',
                tasks: 'less'
            },
            uglify: {
                files: 'assets/**/*.js',
                tasks: 'uglify'
            }
        },
        copy: {
            readme: {
                files: [
                    { src: ['plugin/plugin-name/readme.txt'], dest: 'filebase/readme.txt' }
                ]
            }
        },
        compress: {
            archive: {
                options: {
                    archive: 'filebase/plugin-name.zip'
                },
                files: [
                    { expand: true, cwd: 'plugin/plugin-name/', src: ['**'], dest: 'plugin-name/' }
                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-checktextdomain');

    // Default task.
    grunt.registerTask('dist-css', ['less', 'autoprefixer']);
    grunt.registerTask('default', ['less', 'uglify', 'autoprefixer', 'copy']);

    // Update finish
    grunt.registerTask('finish', ['copy']);
};