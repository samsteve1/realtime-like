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
        </div>


    </div>
</template>

<script>
    export default {
        props: ['post']
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

</style>
