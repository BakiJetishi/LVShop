const toggleMenu = document.querySelector('.show-menu')
const hambugerMenu = document.querySelector('#mobile-menu')

if (toggleMenu) {
    toggleMenu.addEventListener("click", () => {
        hambugerMenu.classList.toggle('hidden')
    })
}

const successMsg = document.getElementById('success-message');

if (successMsg) {
    setTimeout(() => {
        successMsg.remove();
    }, 3000);
}

const categories = document.getElementById('categories');
const products = document.getElementById('products');

if (categories && products) {
    categories.addEventListener('click', function (e) {
        const id = e.target.getAttribute('data-id');

        if (id == null) return

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/products/category`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ categoryId: id })
        })
            .then(response => response.json())
            .then(data => {
                products.innerHTML = ``
                data.forEach(product => {
                    products.innerHTML += `
                    <div class="bg-white border rounded-lg p-5 shadow-md flex justify-between flex-col">
                        <a href="/products/${product.id}" ><div class="text-[20px] text-center">${product.title}</div></a>
                        <a href="/products/${product.id}" ><img src="/storage/${product.img}"/></a>
                        <div class="flex justify-between text-lg items-end mx-3 mt-6">
                            <p>Price: <span class="text-2xl text-red-500">$${product.price}</span></p>
                            <form method="POST" action="/cart/product">
                            <input type="hidden" name="_token" value="${csrfToken}" />
                                <input type="hidden" name="title" value="${product.title}"/>
                                <input type="hidden" name="price" value="${product.price}"/>
                                <input type="hidden" name="product_id" value="${product.id}"/>
                                <input type="hidden" name="img" value="${product.img}"/>
                                <input type="hidden" name="qty" value="1"/>
                                <button class="p-3 rounded-md text-sm bg-orange-200 mt-5 flex" type="submit"><i class="fa-solid fa-cart-plus"></i></button>
                            </form>
                        </div>
                    </div>
                    `
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch request.', error);
            });
    });

    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', () => {
            checkboxes.forEach(other => {
                if (other !== checkbox) {
                    other.checked = false;
                }
            });
        });
    });
}