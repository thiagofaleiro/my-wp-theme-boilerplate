// Posts cache class
// -----------------------------------------
class PostsCache{
  constructor(){
    this.cache = {};
  }

  add(data){
    if (!data.page || !data.posts){ return; }
    let page = {};
    data.posts.forEach( (p) => page[p.ID] = p );
    this.cache[data.page] = page;
  }

  getPage(page){
    let posts = this.cache[page];
    if (posts){
      posts = Object.keys(posts).map( (p) => posts[p] );
    }
    return posts;
  }

  getPost(postId){
    let post;
    for (var pg of Object.keys(this.cache)){
      if( this.cache[pg][postId] ){
        post = this.cache[pg][postId];
        break;
      }
    }
    return post;
  }
}

export default PostsCache;
