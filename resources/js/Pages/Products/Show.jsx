//หน้าแสดงรายละเอียดสินค้า
//โค้ดนี้สร้างหน้ารายละเอียดของสินค้าในแอปพลิเคชัน React 
// โดยแสดงรูปภาพ ชื่อสินค้า คำอธิบาย ราคา และมีปุ่มที่เชื่อมไปยังหน้ารายการสินค้า

import { Link } from '@inertiajs/react';//ไว้เชื่อมระหว่าง frontend กับ backend 

// ฟังค์ชั่น show เชื่อมกับ หน้า productcontroller
export default function Show({ product }) {
  return (
    <div style={{ maxWidth: '800px', margin: '0 auto', padding: '20px', border: '1px solid #ddd', borderRadius: '8px', boxShadow: '0 4px 8px rgba(57, 44, 44, 0.1)' }}>
      {/* เพิ่มรูปภาพ */}
      <img
        src={product.image}
        alt={product.name}
        style={{ maxWidth: '100%', height: '300px', objectFit: 'cover', marginBottom: '20px', borderRadius: '8px' }}
      />
      {/*ชื่อสินค้า  */}
      <h1 style={{ fontSize: '2rem', color: '#333', marginBottom: '15px' }}>{product.name}</h1> 
      {/* รายละเอียดสินค้า */}
      <p style={{ fontSize: '1.1rem', color: '#555', marginBottom: '10px' }}>{product.description}</p>
      {/* ราคาสินค้า */}
      <p style={{ fontSize: '1.5rem', fontWeight: 'bold', color: '#007BFF', marginBottom: '20px' }}>
        ราคา: ${product.price}
      </p>

      {/* ลิ้งกลับไปหน้าหลัก */}
      <Link
        href="/products"
        style={{
          display: 'inline-block',
          textDecoration: 'none',
          backgroundColor: '#28a745',
          color: '#fff',
          padding: '8px 12px',
          borderRadius: '4px',
        }}
      >
        กลับไปยังหน้าสินค้า
      </Link>
    </div>
  );
}
//หน้าแสดงรายละเอียดสินค้า
//โค้ดนี้สร้างหน้ารายละเอียดของสินค้าในแอปพลิเคชัน React 
// โดยแสดงรูปภาพ ชื่อสินค้า คำอธิบาย ราคา และมีปุ่มที่เชื่อมไปยังหน้ารายการสินค้า