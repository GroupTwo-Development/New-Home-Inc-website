<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class CommunitiesRewritesRules extends BaseController{
	public function register() {
//		add_action( 'generate_rewrite_rules', array($this, 'register_communities_rewrite_rules') );
//		add_filter( 'request', array($this, 'fix_communities_subcategory_query'), 10 );
//		add_filter( 'post_type_link', array($this, 'filter_communities_post_link'), 100, 3 );
//		add_filter( 'term_link', array($this, 'filter_communities_section_terms_link'), 100, 3 );
	}

	public static function register_communities_rewrite_rules( $wp_rewrite ) {
		$new_rules = array(
			'communities/([^/]+)/?$' => 'index.php?metro-area=' . $wp_rewrite->preg_index( 1 ),
			'communities/([^/]+)/([^/]+)/?$' => 'index.php?post_type=communities&metro-area=' . $wp_rewrite->preg_index( 1 ) . '&communities=' . $wp_rewrite->preg_index( 2 ),
			'communities/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=communities&metro-area=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
			'communities/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=communities&metro-area=' . $wp_rewrite->preg_index( 2 ) . '&communities=' . $wp_rewrite->preg_index( 3 ),
		);

		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
	}

	// A hacky way of adding support for flexible custom permalinks
	// There is one case in which the rewrite rules from register_kb_rewrite_rules() fail:
	// When you visit the archive page for a child section(for example: http://example.com/communities/category/child-category)
	// The deal is that in this situation, the URL is parsed as a Knowledgebase post with slug "child-category" from the "category" section
	public static function fix_communities_subcategory_query($query) {
		if ( isset( $query['post_type'] ) && 'communities' == $query['post_type'] ) {
			if ( isset( $query['communities'] ) && $query['communities'] && isset( $query['metro-area'] ) && $query['metro-area'] ) {
				$query_old = $query;
				// Check if this is a paginated result(like search results)
				if ( 'page' == $query['metro-area'] ) {
					$query['paged'] = $query['name'];
					unset( $query['metro-area'], $query['name'], $query['communities'] );
				}
				// Make it easier on the DB
				$query['fields'] = 'ids';
				$query['posts_per_page'] = 1;

				// See if we have results or not
				$_query = new \WP_Query( $query );
				if ( ! $_query->posts ) {
					$query = array( 'metro-area' => $query['communities'] );
					if ( isset( $query_old['metro-area'] ) && 'page' == $query_old['metro-area'] ) {
						$query['paged'] = $query_old['name'];
					}
				}
			}
		}
		return $query;
	}


	public static function communities_article_permalink( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
		$taxonomy = 'metro-area';
		$article = get_post( $article_id );
		$return = '<a href="';
		$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'metro-area' ) ) : home_url( '/communities/' );
		$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
		$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
		return ( $only_permalink ) ? $permalink : $return;
	}

	public static function filter_communities_post_link( $permalink, $post, $leavename ) {
		if ( get_post_type( $post->ID ) == 'communities' ) {
			$terms = wp_get_post_terms( $post->ID, 'metro-area' );
			$term = ( $terms ) ? $terms[0]->term_id : false;
			$permalink = self::communities_article_permalink( $post->ID, $term, $leavename, true );
		}
		return $permalink;
	}


	public static function filter_communities_section_terms_link( $termlink, $term, $taxonomy = false ) {
		if ( $taxonomy == 'metro-area' ) {
			$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
			krsort( $section_ancestors );
			$termlink =  home_url( '/communities/' );
			foreach ( $section_ancestors as $ancestor ) {
				$section_ancestor = get_term( $ancestor, $taxonomy );
				$termlink .= $section_ancestor->slug . '/';
			}
			$termlink .= trailingslashit( $term->slug );
		}

		return $termlink;
	}

}
