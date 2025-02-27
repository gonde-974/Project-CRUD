<style>
        /* Background and layout setup */
        
        
        /* General Body Styling */
        body {
            background-color: #e9ecef;
            color: #343a40;
            font-family: 'Helvetica Neue', sans-serif;
        }

        /* Container Styling */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding-top: 30px;
        }

        /* Table Container */
        .table-container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .table-container:hover {
            transform: translateY(-5px);
        }

        /* Button Styling */
        .btn-custom {
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-custom:hover {
            color: #fff;
            background-color: #495057;
        }

        .btn-primary, .btn-outline-primary {
            background-color: #1c7ed6;
            color: #fff;
            border: none;
        }

        .btn-primary:hover, .btn-outline-primary:hover {
            background-color: #1864ab;
        }

        .btn-success {
            background-color: #12b886;
            border: none;
        }

        .btn-success:hover {
            background-color: #0ca678;
        }

        /* Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .table th {
            background-color: #495057;
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 700;
            border: none;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }

        /* Modal Styling */
        .modal-content {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #343a40;
            color: #ffffff;
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* Input Field Styling */
        input.form-control, textarea.form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }

        input.form-control:focus, textarea.form-control:focus {
            border-color: #1c7ed6;
            box-shadow: 0 0 5px rgba(28, 126, 214, 0.3);
        }

        /* Alert Styling */
        .alert {
            border-radius: 8px;
            font-weight: 600;
        }

        .alert-success {
            background-color: #d3f9d8;
            color: #2f9e44;
        }

        .alert-danger {
            background-color: #ffccd5;
            color: #d6336c;
        }
        .btn-custom, .edit-btn, .btn-danger, .btn-success, .add_comment {
    width: 120px; /* Еднаква ширина за сите копчиња */
    height: 40px; /* Еднаква висина за сите копчиња */
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px; /* Заоблени агли за модерен изглед */
    transition: all 0.3s ease;
    color: #ffffff;
}

/* Боја и стил на копчињата */
.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    border: none;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #218838);
    border: none;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
}

/* Сенка при ховерирање и промена на боја */
.btn-custom:hover, .btn-primary:hover, .btn-danger:hover, .btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    opacity: 0.9;
}

/* Икони во копчињата */
.btn-custom i, .edit-btn i, .btn-danger i, .btn-success i {
    margin-right: 5px; /* Простор помеѓу иконата и текстот */
}

    </style>


  