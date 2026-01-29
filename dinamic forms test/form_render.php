<?php foreach ($fields as $f):
    $name = $f['name'];
    $error = $errors[$name] ?? null;
    ?>

    <div class="mb-3">
        <label class="form-label">
            <?= htmlspecialchars($f['label']) ?>
            <?= $f['required'] ? '<span class="text-danger">*</span>' : '' ?>
        </label>

        <?php if ($f['type'] === 'select'): ?>
            <select name="<?= $name ?>" class="form-select <?= $error ? 'is-invalid' : '' ?>">
                <option value="">Seleccione</option>
                <?php foreach (explode(',', $f['options']) as $opt): ?>
                    <option value="<?= $opt ?>" <?= ($values[$name] ?? '') === $opt ? 'selected' : '' ?>>
                        <?= $opt ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <?php elseif ($f['type'] === 'textarea'): ?>
            <textarea name="<?= $name ?>" class="form-control <?= $error ? 'is-invalid' : '' ?>">
                    <?= htmlspecialchars($values[$name] ?? '') ?>
                </textarea>

        <?php else: ?>
            <input type="<?= $f['type'] ?>" name="<?= $name ?>" value="<?= htmlspecialchars($values[$name] ?? '') ?>"
                class="form-control <?= $error ? 'is-invalid' : '' ?>">
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="invalid-feedback"><?= $error ?></div>
        <?php endif; ?>
    </div>

<?php endforeach; ?>