<?php
    class index {

        public function meta() {
            $meta['title'] = SITE_TITLE;
            $meta['description'] = "Welcome to our membership site";
            $meta['keywords'] = "social network, membership, ".SITE_TITLE."";
            $meta['robots'] = "index, follow";
            $meta['expires'] = "43200";

            return $meta;
        }
    }

    global $meta;

    $index = new index();
    $meta = $index->meta();