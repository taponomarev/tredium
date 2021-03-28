document.addEventListener('DOMContentLoaded', () => {
    const articleSingle = document.querySelector('.article-single');

    if (articleSingle) {
        setTimeout(() => {
            const viewLabel = articleSingle.querySelector('.view-label');
            const btnLike = articleSingle.querySelector('.btn-like');
            createView(btnLike.dataset.id, viewLabel);
        }, 5000);
    }
});

const createView = (articleId, resultElement) => {
    axios.post(`/api/article_views`, {articleId})
        .then((response) => {
            if (response.status === 200) {
                resultElement.textContent = response.data.message;
            }
        })
        .catch((response) => {
            alert(response.error)
        })
}
