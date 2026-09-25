<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

    <h2>Edit Category</h2>

    <form action="<?php echo e(url('/updatecategory/'.$category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label>Category Name</label>
            <input type="text" name="Name" value="<?php echo e($category->Name); ?>" required>
        </div>

        <br>

        <div>
            <label>Category Type</label>

            <select name="type" required>

                <option value="">Select Category Type</option>

                <option value="Income"
                    <?php echo e($category->type == 'Income' ? 'selected' : ''); ?>>
                    Income
                </option>

                <option value="Expense"
                    <?php echo e($category->type == 'Expense' ? 'selected' : ''); ?>>
                    Expense
                </option>

            </select>
        </div>

        <br>

        <button type="submit">Update Category</button>

        <a href="<?php echo e(url('/categories')); ?>">Cancel</a>

    </form>

</body>
</html><?php /**PATH C:\Users\Fi-tecH\Techwiz\Techwiz\resources\views/Editcategory.blade.php ENDPATH**/ ?>