<style>

.bgimg {
  background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("images/red.jpg");
}

.btn-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #f4623a;
    --bs-btn-border-color: #f4623a;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #f05f42;
    --bs-btn-hover-border-color: #f4623a;
    --bs-btn-focus-shadow-rgb: 49, 132, 253;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #f4623a;
    --bs-btn-active-border-color: #0a53be;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #f4623a;
    --bs-btn-disabled-border-color: #f4623a;
}

.btn-outline-primary {
    --bs-btn-color: #f4623a;
    --bs-btn-border-color: #f4623a;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #f05f42;
    --bs-btn-hover-border-color: #f05f42;
    --bs-btn-focus-shadow-rgb: 13, 110, 253;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #f4623a;
    --bs-btn-active-border-color: #f4623a;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #f4623a;
    --bs-btn-disabled-bg: transparent;
    --bs-btn-disabled-border-color: #f4623a;
    --bs-gradient: none;
}

.pagination {
    --bs-link-color: #f4623a;
    --bs-pagination-padding-x: 0.75rem;
    --bs-pagination-padding-y: 0.375rem;
    --bs-pagination-font-size: 1rem;
    --bs-pagination-color: var(--bs-link-color);
    --bs-pagination-bg: var(--bs-body-bg);
    --bs-pagination-border-width: var(--bs-border-width);
    --bs-pagination-border-color: var(--bs-border-color);
    --bs-pagination-border-radius: var(--bs-border-radius);
    --bs-pagination-hover-color: var(--bs-link-hover-color);
    --bs-pagination-hover-bg: var(--bs-tertiary-bg);
    --bs-pagination-hover-border-color: var(--bs-border-color);
    --bs-pagination-focus-color: var(--bs-link-hover-color);
    --bs-pagination-focus-bg: var(--bs-secondary-bg);
    --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    --bs-pagination-active-color: #fff;
    --bs-pagination-active-bg: ##f4623a;
    --bs-pagination-active-border-color: ##f4623a;
    --bs-pagination-disabled-color: var(--bs-secondary-color);
    --bs-pagination-disabled-bg: var(--bs-secondary-bg);
    --bs-pagination-disabled-border-color: var(--bs-border-color);
    display: flex;
    padding-left: 0;
    list-style: none;
}

.form-signin {
    max-width: 480px;
    padding: 1rem;
}

.btn-primary {
    color: #fff;
    background-color: #f4623a;
    border-color: #f4623a;
}

.btn-primary:hover {
    background-color: #f05f42;
    border-color: #f05f42;
}

.btn-primary:active {
    background-color: #f05f42;
    border-color: #f05f42;
}

a {
    color: #f4623a;
    text-decoration: none !important;
}

.dropdw {
  position: relative;
  display: inline-block;
}

.dropdw-content {
  display: none;
  position: absolute;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdw:hover .dropdw-content {
  display: block;
}

.card-img, .card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-img, .card-img-display {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
    height: 700px;
    vertical-align: middle;
    transition: transform 0.3s ease;
}

.card-img, .card-img-display:hover {
  transform: scale(1.5);
}

.product-card {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 10px;
    border-radius: 10px;
    text-align: center;
    overflow: hidden;
}

.product-card img {
    height: 200px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.product-card:hover img {
    transform: scale(1.5);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
}

.me{
    height: 1.5rem !important;
}

</style>