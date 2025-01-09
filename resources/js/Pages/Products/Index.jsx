
//หน้าแสดงรายการสินค้า

import { Link } from '@inertiajs/react';
import './Index.css';

export default function Index({ products }) {
  return (
    <div className="container">
      <h1 className="title">Baan Sura</h1>
      <ul className="product-list">
        {products.map((product) => (
          <li key={product.id} className="product-item">
            <img
              src={product.image}
              alt={product.name}
              className="product-image"
            />
            <h2 className="product-name">{product.name}</h2>
            <p className="product-price">ราคา: ${product.price}</p>
            <Link
              href={`/products/${product.id}`}
              className="product-link"
            >
              รายละเอียดสินค้า
            </Link>
          </li>
        ))}
      </ul>
    </div>
  );
}

