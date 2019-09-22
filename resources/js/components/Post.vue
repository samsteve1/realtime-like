<template>
    <div class="media">

     <div class="media-left">
        <a href="#">
            <img class="media-object" :src="post.user.avatar" :alt="post.user.name + ' avatar'">
        </a>
     </div>

        <div class="media-body">
            <strong>{{ post.user.name }}</strong>
            <p>{{ post.body }}</p>
            <p>{{ post.likeCount }} {{ post.likeCount >1 || post.likeCount == 0 ? ' likes' : ' like' }}</p>

            <like-button v-if="!post.likedByCurrentUser && post.user.id != $root.user_id" :post="post"></like-button>
        </div>


    </div>
</template>

<script>
import LikeButton from './LikeButton.vue'
import pluralize from 'pluralize'

    export default {
        props: ['post'],
        components () {
            LikeButton
        },
        methods: {
            pluralize() {
                pluralize
            }
        },
    }
</script>

<style lang="css">

    .media{
        position: relative;
        margin: 0;
        padding: 10px;
    }
    .media-left{
        margin-right: 2px;
    }
    .media:hover .like{
        display: block;
    }

</style>
