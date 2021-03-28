document.addEventListener('DOMContentLoaded', () => {
   const likes = document.querySelectorAll('.btn-like');

   if (likes.length > 0) {
       Array.from(likes).forEach((like) => {
           like.addEventListener('click', () => {
               const likeLabel = like.querySelector('.like-label');
               createLike(like.dataset.id, likeLabel);
           });
       })
   }
});

const createLike = (articleId, resultElement) => {
    axios.post(`/api/article_likes`, {articleId})
        .then((response) => {
            if (response.status === 200) {
                resultElement.textContent = response.data.message;
            }
        })
        .catch((response) => {
           alert(response.error)
        })
}
