import { router } from '@inertiajs/react';
import React, { useState } from 'react';
import FlashMessage from '@/Components/FlashMessage'; // นำเข้า FlashMessage 
import { usePage } from '@inertiajs/react';

const EmployeeList = ({ employees, query, sort, direction }) => {
    const [search, setSearch] = useState(query || '');
    const { flash } = usePage().props;

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/employees', { search }); // ค้นหาข้อมูลพนักงาน
    };

    const handleSort = (column) => {  //เรียงลำดับข้อมูลพนักงาน
        router.get('/employees', {
            search,
            sort: column,
            direction: sort === column && direction === 'asc' ? 'desc' : 'asc',
        });
    };

    return ( // หน้าแสดงข้อมูลพนักงาน 
        <div className="min-h-screen bg-white py-10">
            <FlashMessage flash={flash} />
            <h1 className="text-4xl font-extrabold text-center text-purple-600 drop-shadow-lg mb-8">
                Employee List
            </h1>

            {/* Search Bar */}
            <form onSubmit={handleSearch} className="mb-6 flex justify-center">
                <input
                    type="text"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                    className="w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-400"
                    placeholder="🔍 Search by first or last name"
                />
                <button
                    type="submit"
                    className="ml-4 px-6 py-2 bg-purple-500 text-white font-semibold rounded-lg shadow-md hover:bg-purple-600 transition duration-300"
                >
                    Search
                </button>
            </form>

            {/* Table */}
            {employees.data.length === 0 ? (    //ตารางแสดงข้อมูลพนักงาน
                <div className="text-center text-gray-600 text-lg mt-8">
                    🚫 No results found.
                </div>
            ) : (
                <div className="overflow-x-auto mx-auto max-w-5xl">
                    <table className="table-auto w-full border border-gray-200 shadow-lg bg-white rounded-lg overflow-hidden">
                        <thead className="bg-purple-600 text-white uppercase text-sm">
                            <tr>
                                {['ID', 'First Name', 'Last Name', 'Age', 'Photo'].map((column, index) => (
                                    <th
                                        key={index}
                                        className="py-4 px-6 text-left cursor-pointer hover:opacity-80 transition"
                                        onClick={() => handleSort(column.toLowerCase().replace(' ', '_'))}
                                    >
                                        {column}
                                    </th>
                                ))}
                            </tr>
                        </thead>
                        <tbody className="text-gray-700 text-sm">
                            {employees.data.map((employee, index) => (
                                <tr
                                    key={index}
                                    className={`border-b transition duration-300 ${index % 2 === 0 ? 'bg-gray-100' : 'bg-white'
                                        }`}
                                >
                                    <td className="py-4 px-6">{employee.emp_no}</td>
                                    <td className="py-4 px-6">{employee.first_name}</td>
                                    <td className="py-4 px-6">{employee.last_name}</td>
                                    <td className="py-4 px-6">{employee.birth_date}</td>
                                    <td className="py-4 px-6">
                                        {employee.photo ? (
                                            <img
                                                src={`/storage/${employee.photo}`}
                                                alt={`${employee.first_name} ${employee.last_name}`}
                                                className="w-12 h-12 rounded-full object-cover border border-gray-300 shadow-sm"
                                            />
                                        ) : (
                                            <span className="text-gray-400">No photo</span>
                                        )}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}


            {/* Pagination */}
            <div className="flex justify-center mt-6">
                {employees.links &&
                    employees.links.map((link, index) => (
                        <button
                            key={index}
                            onClick={() => link.url && router.get(link.url)}
                            className={`px-4 py-2 mx-1 border rounded-md transition duration-300 ${link.active
                                ? 'bg-purple-500 text-white shadow-md'
                                : 'bg-white text-purple-500 border-purple-400 hover:bg-purple-100'
                                }`}
                            dangerouslySetInnerHTML={{ __html: link.label }}
                        />
                    ))}
            </div>
        </div>
    );
};

export default EmployeeList; // ส่งออก EmployeeList
