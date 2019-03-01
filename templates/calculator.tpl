<div class="calc">
    <form class="calc-form" action="/calculator.php" method="post">
        <input type="text" name="a" placeholder="Первый аргумент" size="11" required/>
        <label for="operations"></label>
        <select name="operations" id="operations" required>
            <option disabled selected>Оператор</option>
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">*</option>
            <option value="division">/</option>
        </select>
        <input type="text" name="b" placeholder="Второй аргумент" size="11" required/>
        <input type="submit" value="="/>
    </form>
    <div class="calc-result"><b>{{RESULT}}</b></div>
</div>

<div class="calc2">
    <form class="calc-form2" action="/calculator.php" method="post">
        <input type="text" name="x" placeholder="Первый аргумент" size="11" required/>
        <input type="text" name="y" placeholder="Второй аргумент" size="11" required/>
        <button name="operator2" type="submit" value="addition">+</button>
        <button name="operator2" type="submit" value="subtraction">-</button>
        <button name="operator2" type="submit" value="multiplication">*</button>
        <button name="operator2" type="submit" value="division">/</button>
    </form>
    <div class="calc-result2"><b>= {{RESULT2}}</b></div>
</div>