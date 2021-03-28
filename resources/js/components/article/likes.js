document.addEventListener('DOMContentLoaded', () => {
    const likeButtons = document.querySelectorAll('.btn-like');

    if (likeButtons.length > 0) {
        Array.from(likeButtons).forEach((like) => {
            like.addEventListener('click', () => {
                const likeLabel = like.querySelector('.like-label');
                createLike(like.dataset.id, likeLabel);
            });
        });
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
