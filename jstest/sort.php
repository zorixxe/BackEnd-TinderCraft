<p>Show me</p>
<select name="preferences" id="preference">
    <option value="4" <?php if ($_REQUEST['preference'] == 4) echo "selected" ?>>All</option>
    <option value="1" <?php if ($_REQUEST['preference'] == 1) echo "selected" ?>>Men</option>
    <option value="2" <?php if ($_REQUEST['preference'] == 2) echo "selected" ?>>Women</option>
    <option value="3" <?php if ($_REQUEST['preference'] == 3) echo "selected" ?>>Others</option>
</select>

<p id="sortp">Sort by:</p>
<select name="sort" id="sort">
    <option value="">Random</option>
    <option value="likes-asc" <?php if ($_REQUEST['sort'] == "likes-asc") echo "selected" ?>>Likes (Ascending)</option>
    <option value="likes-desc" <?php if ($_REQUEST['sort'] == "likes-desc") echo "selected" ?>>Likes (Descending)</option>
    <option value="salary-asc" <?php if ($_REQUEST['sort'] == "salary-asc") echo "selected" ?>>Salary (Ascending)</option>
    <option value="salary-desc" <?php if ($_REQUEST['sort'] == "salary-desc") echo "selected" ?>>Salary (Descending)</option>
    <option value="zipcode-asc" <?php if ($_REQUEST['sort'] == "zipcode-asc") echo "selected" ?>>Zipcode (Ascending)</option>
    <option value="zipcode-desc" <?php if ($_REQUEST['sort'] == "zipcode-desc") echo "selected" ?>>Zipcode (Descending)</option>
</select>