<form
        class="search-form"
        role="search"
        method="get"
        id="searchform"
        action=""
    >
        <input
            class="search-input"
            type="text"
            placeholder="Поиск"
            value="<?php echo get_search_query(); ?>"
            name="s"
            id="s" 
        />
        <button
            class="search-button"
            type="submit"
            id="searchsubmit"
        ></button>
    </form>
    <a href="#" class="header-menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </a>
</div>