<div class="ignore-css">
    <h1>Development</h1>
    <div>
        <section typeof="sa:AuthorsList">
            <h2>Authors</h2>
            <ul>
              <li typeof="sa:ContributorRole" property="schema:author">
                <span typeof="schema:Person"
                      resource="https://en.wikipedia.org/wiki/John_Henry_Holland">
                  <meta property="schema:givenName" content="Madalina">
                  <meta property="schema:additionalName" content="Bianca">
                  <meta property="schema:familyName" content="Enasel">
                  <span property="schema:name">Madalina B. Enasel</span>
                </span>
              </li>
              <li typeof="sa:ContributorRole" property="schema:author">
                <span typeof="schema:Person"
                      resource="https://en.wikipedia.org/wiki/John_Henry_Holland">
                  <meta property="schema:givenName" content="Catalina">
                  <meta property="schema:additionalName" content="Elena">
                  <meta property="schema:familyName" content="Kissinger">
                  <span property="schema:name">Catalina E. Kissinger</span>
                </span>
              </li>
              <li typeof="sa:ContributorRole" property="schema:author">
                <span typeof="schema:Person"
                      resource="https://en.wikipedia.org/wiki/John_Henry_Holland">
                  <meta property="schema:givenName" content="Razvan">
                  <meta property="schema:additionalName" content="">
                  <meta property="schema:familyName" content="Alexe">
                  <span property="schema:name">Razvan Alexe</span>
                </span>
              </li>
            </ul>
          </section>
        <section>
            <h1>
                Table of Contents
            </h1>
            <ul>
                <li><a href=#1>Development</a></li>
                <ul>
                    <li><a href=#1.1>Website structure</a></li>
                    <li><a href=#1.2>Javascript</a></li>
                    <li><a href=#1.3>SQL</a></li>
                    <li><a href=#1.4>Authentication</a></li>
                </ul>
        </section>
        <section >
            <h1 id="1">
                1. Development process
            </h1>
            <h2 id="1.1">
                1.1 Website structure
            </h2>
            <p>
                In order to obtain the desired structure of the website the MVC design pattern was used.
                A default layout of HTML code is used to represent the page, but the main part of it is retrieved by parsing .php documents.
                The information in those documents are created by a controller that uses models to decide the behaviour of the wanted page.
                The controller does the php logic of the page, while the model contains the database queries.
                Each page request is parsed and the dispatcher reroutes the code to the desired controller.
            </p>
            <h2 id="1.2">
                1.2 Javascript
            </h2>
            <p>
                JQuery is used to script the ajax requests. The data from the controllers is used for the on click functions scripted in javascript that
                prepare the requests inbetween pages. The js document also contains the scripts for the email verification function aswell as the click
                functions for certain html elements.
            </p>
            <h2 id="1.3">
                1.3 SQL
            </h2>
            <p>
                The website information is stored in an SQL database. The interactions with the database are stored in the models of the MVC. In order to 
                prevent unwanted injections the states are prepared then executed using PDO.
            </p>
            <h2 id="1.4">
                1.4 Authentication
            </h2>
            <p>
                In order to validate a login and maintain is the login process involves a SQL query that verifies the credentials then stores them in session variables.
            </p>
            <h2 id="1.5">
                1.5 Github
            </h2>
            <p>
                With the help of the Github website the development has been an easy process. The code was able to be shared and modified with other members of the team regardless
                of their location.
            </p>
        </section>
    </div>
    <div>