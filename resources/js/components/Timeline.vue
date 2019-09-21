<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Timeline</div>

                    <div class="card-body">
                    <post-form></post-form>
                        <post v-for="post in posts" :post="post" :key="post.id"></post>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Post from './Post.vue';
import PostFrom from './PostForm';
import eventBus from '../event';

    export default {
        data() {
            return {
                posts: []
            }
        },

        mounted() {
            let posts = axios.get('/posts').then((response) => {
                this.posts = response.data
            })

            eventBus.$on('post-submitted', this.addPost);

        },

        components() {
            Post: 'post',
            PostForm
        },
        methods: {
            addPost(post) {
                this.posts.unshift(post)
            }
        },
    }
</script>
