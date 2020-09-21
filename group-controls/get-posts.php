<?php

namespace Suprementor\Group_Controls;

class Get_Posts extends \Elementor\Group_Control_Base {

    /**
    * Fields.
    *
    * Holds all the control fields.
    *
    * @since 1.0.0
    */
    protected static $fields;

    /**
    * Get Type
    * @since 1.0.0
    */
    public static function get_type() {
        return 'sup_group_controls_get_posts';
    }

    /**
    * Init Fields
    * @since 1.0.0
    */
    protected function init_fields() {

        $args = $this->get_args();

        $fields = [];

        $post_options = \Suprementor\Helpers\General::get_post_options();

        $fields['source'] = [
            'label'         => __( 'Source', 'blog-supreme-elementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'group' => __( 'Group', 'blog-supreme' ),
                'query' => __( 'Query', 'blog-supreme' )
            ],
            'default'       => 'query',
            'label_block'   => false,
            'export'        => false,
        ];

        $fields['post_group_ids'] = [
            'label'     => __( 'Posts', 'elementor-pro' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'options'   => $post_options,
            'select2options' => [
                'minimumInputLength' => 3,
            ],
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'group',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['restrict_categories'] = [
            'label'     => __( 'Restrict Categories', 'blog-supreme-elementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_post_categoy_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['restrict_tags'] = [
            'label'     => __( 'Restrict Tags', 'blog-supreme-elementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_post_tag_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['restrict_authors'] = [
            'label'     => __( 'Restrict Authors', 'blog-supreme' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_author_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['offset'] = [
            'label'         => __( 'Offset', 'blog-supreme' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'min'           => 0,
            'max'           => 200,
            'step'          => 1,
            'default'       => 0,
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ]
        ];

        $fields['posts_per_page'] = [
            'label'         => __( 'Count', 'blog-supreme' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'min'           => 1,
            'max'           => 200,
            'step'          => 1,
            'default'       => 3,
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ]
        ];

        $fields['orderby'] = [
            'label'         => __( 'Order By', 'blog-supreme-elementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'date'          => __( 'Date', 'blog-supreme' ),
                'name'          => __( 'Name', 'blog-supreme' ),
                'comment_count' => __( 'Comment Count', 'blog-supreme' ),
                'modified'      => __( 'Last Modified', 'blog-supreme' ),
                'random'        => __( 'Random', 'blog-supreme' ),
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'group',
                    ]
                ]
            ],
            'default'       => 'date',
            'label_block'   => false,
            'export'        => false,
        ];

        $fields['order'] = [
            'label'         => __( 'Order', 'blog-supreme-elementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'asc'             => __( 'Ascending', 'blog-supreme' ),
                'desc'          => __( 'Descending', 'blog-supreme' ),
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'group',
                    ]
                ]
            ],
            'default'       => 'desc',
            'label_block'   => false,
            'export'        => false,
        ];

        return $fields;

    }

    /**
    * Get default options.
    *
    * @since 1.0.0
    * @access protected
    *
    * @return array Default image size control options.
    */
    protected function get_default_options() {

        $args = $this->get_args();

        if ( !empty($args['popover']) ) {

            $return['popover'] = [
                'starter_name' => self::get_type(),
                'settings' => [
                    'render_type' => 'ui',
                ],
            ];

        } else {

            $return['popover'] = false;

        }

        return $return;
    }

    /**
    * Process Control.
    * @since 1.0.0
    * @access protected
    *
    * @return array Array of post IDs or empty array if no posts found.
    */
    public static function process_control( $settings, $control_name ) {

        if ( empty( $settings[$control_name . '_source'] ) ) {

            return [];

        }

        // get a group of posts by IDs
        if ( $settings[$control_name . '_source'] == 'group' ) {

            if ( ! is_array( $settings[$control_name . '_post_group_ids'] ) || empty( $settings[$control_name . '_post_group_ids'] ) ) {
                return [];
            }

            foreach ( $settings[$control_name . '_post_group_ids'] as $v ) {
                if ( ! is_numeric( $v )) {
                    return [];
                }
            }

            $args = [
                'post_type' => 'post',
                'post__in' => $settings[$control_name . '_post_group_ids'],
                'fields' => 'ids',
                'order' => $settings[$control_name . '_order'],
                'orderby' => $settings[$control_name . '_orderby']
            ];

            return get_posts( $args );

        }

        // get a group of posts by IDs
        if ( $settings[$control_name . '_source'] == 'query' ) {

            $args = [
                'post_type' => 'post',
                'fields' => 'ids',
                'order' => $settings[$control_name . '_order'],
                'orderby' => $settings[$control_name . '_orderby'],
                'posts_per_page' => $settings[$control_name . '_posts_per_page'],
                'offset' => $settings[$control_name . '_offset'],
            ];

            if ( ! empty( $settings[$control_name . '_restrict_categories'] ) ) {
                $args['category__in'] = $settings[$control_name . '_restrict_categories'];
            }

            if ( ! empty( $settings[$control_name . '_restrict_tags'] ) ) {
                $args['tag__in'] = $settings[$control_name . '_restrict_tags'];
            }

            if ( ! empty( $settings[$control_name . '_restrict_authors'] ) ) {
                $args['author__in'] = $settings[$control_name . '_restrict_authors'];
            }

            return get_posts( $args );

        }

    }

}
