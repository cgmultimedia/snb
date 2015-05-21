
module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            jsVendors: {
                files: ['src/js/vendors/**/*.js'],
                tasks: ['uglify:vendors']
            },
            jsSrc: {
                files: ['src/js/custom/**/*.js'],
                tasks: ['concat:customJs', 'uglify:custom']
            },
            scss: {
                files: ['src/scss/**/*.scss'],
                tasks: ['sass:dev','cssmin']
            }
        },

        sass: {
            dev: {
                options: {
                    // includePaths: require('node-bourbon').with('other/path', 'another/path')
                    // - or -
                    loadPath: require('node-bourbon').includePaths,
                    lineNumbers: true
                        //quiet: true
                },
                files: [{
                    expand: true,
                    cwd: 'src/scss',
                    src: ['**/*.scss'],
                    dest: './css',
                    ext: '.css'
                        //environment: 'development'
                }]
            }
        },

        concat: {
            customJs: {
                options: {
                    separator: '\r\n /*******************************/ \r\n'
                },                 
                files: {
                    'build/js/app.js': [
                        // NOTE: This initializes any needed vendor packages. (but not neededs as it is part of main layout)
                        'src/js/custom/NavArea.js',
                        'src/js/custom/vendor_inits.js',
                        'src/js/custom/isNonDragMouseClick.js', 
                        'src/js/custom/videoClick.js', 
                    ],
                },
            },
        },
        uglify: {
            custom: {
                files: { 
                    //  NOTE: there were issues with combining these vendor libraries.
                    // 'build/js/vendors.min.js': [
                    //     'src/js/vendors/jquery.js',
                    //     'src/js/vendors/foundation.min.js',
                    //     'src/js/vendors/foundation/foundation.topbar.js',
                    //     'src/js/vendors/fastclick.js',
                    // ],
                    'build/js/app.min.js': [
                        'build/js/app.js'
                    ]
                }
            }, 
            vendors : {
                files: {
                    'build/js/vendors.min.js': [
                        'src/js/vendors/jquery.1.11.1.min.js',
                        'src/js/vendors/jquery.imagesloaded.js',
                        'src/js/vendors/jquery.wookmark.min.js',
                        'src/js/vendors/bootstrap.small/js/bootstrap.min.js',
                        'src/js/vendors/fastclick.js',
                        'src/js/vendors/velocity.1.2.1.min.js',
                        //'src/js/vendors/audiojs/audiojs/audio.js',
                        'src/js/vendors/idangerous-swiper/idangerous.swiper.min.js',
                        'src/js/vendors/idangerous-swiper/idangerous.swiper.scrollbar.js',
                        //'src/js/vendors/moment.min.js',
                        //'public/js/vendor_inits.js',
                        //'public/js/isNonDragMouseClick.js',
                    ],
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                    './css/app.min.css': [
                        './css/app.css'
                    ]
                }
            },
            options: {
                keepSpecialComments: 0
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', [
        'sass:dev',
        'cssmin',
        'concat:customJs',
        'uglify'
    ]);
};
