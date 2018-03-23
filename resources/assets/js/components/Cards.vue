<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" v-if="posts.length">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">

                      <div class="card-deck" v-for="post in posts" style="margin-top:30px">

                        <div class="card" :href="post.link" target="_blank">
                          <img class="card-img-top" :src="post.image_url" alt="Card image cap">
                          <hr>
                          <a :href="post.link" target="_blank" class="card-body text-center">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text">{{ post.description }}</p>
                          </a>
                          <div class="card-footer">
                          </div>
                        </div>

                      </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
          return {
            posts: []
          }
        },

        mounted() {
            axios.get('http://producthuntteaching.test/api/producthunt').then((response) => {
              this.posts = response.data
              console.log(this.posts);
            })

        }
    }
</script>
