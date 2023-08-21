document.addEventListener("DOMContentLoaded", function () {
    /**
     * タグ欄を追加するためのID
     */
    const elementAddTag = document.getElementById("addTag");
    /**
     * リンク欄を追加するためのID
     */
    const elementAddLink = document.getElementById("addLink");

    /**
     * テーブルの追加
     *
     * @param {string} name
     * @returns table_data td要素まとめ
     */
    function addTable(name) {
        // td要素以下を作成
        let table_data;
        let table_content;
        let table_input;

        // td要素
        table_data = document.createElement("td");
        // div要素
        table_content = document.createElement("div");
        table_content.setAttribute("class", "input-box");
        // input要素
        table_input = document.createElement("input");
        table_input.setAttribute("type", "text");
        table_input.setAttribute("name", name);
        table_input.setAttribute("required", "required");

        // input要素をdiv要素の子要素化
        table_content.appendChild(table_input);
        // div要素をtd要素の子要素化
        table_data.appendChild(table_content);

        return table_data;
    }

    /**
     * テーブルの追加
     *
     * @param {string} name
     * @returns table_data td要素まとめ
     */
    function addTable2(name) {
        // td要素以下を作成
        let table_data;
        let table_content;
        let table_input;

        // td要素
        table_data = document.createElement("td");
        // div要素
        table_content = document.createElement("div");
        table_content.setAttribute("class", "input-box");
        // input要素
        table_input = document.createElement("input");
        table_input.setAttribute("type", "text");
        table_input.setAttribute("name", name);
        table_input.setAttribute("required", "required");

        // input要素をdiv要素の子要素化
        table_content.appendChild(table_input);
        // div要素をtd要素の子要素化
        table_data.appendChild(table_content);

        return table_data;
    }

    // タグの追加
    if (elementAddTag !== null) {
        document
            .getElementById("addTag")
            .addEventListener("click", function () {
                // tr要素を作成
                let newRow = document.createElement("tr");

                newRow.appendChild(document.createElement("td"));
                newRow.appendChild(addTable2("tag_name[]"));

                // tbodyを検索
                let tableBody = document.querySelector(".input-tag");
                tableBody.appendChild(newRow);
            });
    }

    // linkの追加
    if (elementAddLink !== null) {
        document
            .getElementById("addLink")
            .addEventListener("click", function () {
                // tr要素を作成
                let newRow = document.createElement("tr");

                newRow.appendChild(addTable("link_name[]"));
                newRow.appendChild(addTable("link_url[]"));

                // tbodyを検索
                let tableBody = document.querySelector(".input-table tbody");
                tableBody.appendChild(newRow);
            });
    }
});
