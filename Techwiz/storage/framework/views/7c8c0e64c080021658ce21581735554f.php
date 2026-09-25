<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

    <h2>Add Category</h2>

    <form action="<?php echo e(url('/Addcategorylogic')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label>Category Name</label>
            <input type="text" name="Name" required>
        </div>

        <br>

        <div>
            <label>Category Type</label>

            <select name="type" required>
                <option value="">Select Category Type</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>

        <br>

        <button type="submit">Add Category</button>

    </form>

</body>
</html><?php /**PATH C:\Users\Fi-tecH\Techwiz\Techwiz\resources\views/Addcategory.blade.php ENDPATH**/ ?>