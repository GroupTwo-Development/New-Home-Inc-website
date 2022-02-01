<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

//class homesRewriteRules extends BaseController{
//	public function register() {
//		add_action( 'generate_rewrite_rules', array($this, 'register_homes_rewrite_rules') );
//		add_filter( 'request', array($this, 'fix_homes_subcategory_query'), 10 );
//		add_filter( 'post_type_link', array($this, 'filter_homes_post_link'), 100, 3 );
//		add_filter( 'term_link', array($this, 'filter_homes_section_terms_link'), 100, 3 );
//	}
//
//	public static function register_homes_rewrite_rules( $wp_rewrite ) {
//		$new_rules = array(
//			'homes/([^/]+)/?$' => 'index.php?home-category=' . $wp_rewrite->preg_index( 1 ),
//			'homes/([^/]+)/([^/]+)/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 1 ) . '&homes=' . $wp_rewrite->preg_index( 2 ),
//			'homes/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
//			'homes/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 2 ) . '&homes=' . $wp_rewrite->preg_index( 3 ),
//		);
//
//		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
//	}
//
//
//	public static function fix_homes_subcategory_query($query){
//		if ( isset( $query['post_type'] ) && 'homes' == $query['post_type'] ) {
//			if ( isset( $query['homes'] ) && $query['homes'] && isset( $query['home-category'] ) && $query['home-category'] ) {
//				$query_old = $query;
//				// Check if this is a paginated result(like search results)
//				if ( 'page' == $query['home-category'] ) {
//					$query['paged'] = $query['name'];
//					unset( $query['home-category'], $query['name'], $query['homes'] );
//				}
//				// Make it easier on the DB
//				$query['fields'] = 'ids';
//				$query['posts_per_page'] = 1;
//
//				// See if we have results or not
//				$_query = new \WP_Query( $query );
//				if ( ! $_query->posts ) {
//					$query = array( 'home-category' => $query['homes'] );
//					if ( isset( $query_old['home-category'] ) && 'page' == $query_old['home-category'] ) {
//						$query['paged'] = $query_old['name'];
//					}
//				}
//			}
//		}
//		return $query;
//	}
//
//
//	public static function homes_article_permalink( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
//		$taxonomy = 'home-category';
//		$article = get_post( $article_id );
//
//		$return = '<a href="';
//		$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'home-category' ) ) : home_url( '/homes/' );
//		$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
//		$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
//		return ( $only_permalink ) ? $permalink : $return;
//	}
//
//	public static function filter_homes_post_link( $permalink, $post, $leavename ) {
//		if ( get_post_type( $post->ID ) == 'homes' ) {
//			$terms = wp_get_post_terms( $post->ID, 'home-category' );
//			$term = ( $terms ) ? $terms[0]->term_id : false;
//			$permalink = self::homes_article_permalink( $post->ID, $term, $leavename, true );
//		}
//		return $permalink;
//	}
//
//
//	public static function filter_homes_section_terms_link( $termlink, $term, $taxonomy = false ) {
//		if ( $taxonomy == 'home-category' ) {
//			$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
//			krsort( $section_ancestors );
//			$termlink =  home_url( '/homes/' );
//			foreach ( $section_ancestors as $ancestor ) {
//				$section_ancestor = get_term( $ancestor, $taxonomy );
//				$termlink .= $section_ancestor->slug . '/';
//			}
//			$termlink .= trailingslashit( $term->slug );
//		}
//		return $termlink;
//	}
//
//}






