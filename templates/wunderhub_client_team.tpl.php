<div class="team" data-ng-controller="WHTeamController">
  <div>

    <select ng-model="countryItems" ng-options="person.country for person in Team | unique: 'country' | orderBy: 'country'">
      <option value="">-- Select a country --</option>
    </select>

    <select ng-model="officeItems" ng-options="person.office for person in Team | orderBy: 'office' | filterBy: ['country']: countryItems.country | unique: 'office'">
      <option value="">-- Select an office --</option>
    </select>

    <select ng-model="jobItems" ng-options="person.jobTitle for person in Team | orderBy: 'jobTitle' | filterBy: ['country']: countryItems.country | filterBy: ['office']: officeItems.office | unique: 'jobTitle'">
      <option value="">-- Select a job title --</option>
    </select>

    <ul data-ng-repeat="group in Team | orderBy: 'office' | filterBy: ['country']: countryItems.country | filterBy: ['office']: officeItems.office | filterBy: ['jobTitle']: jobItems.jobTitle | groupBy: Group | toArray:true">
      <h2 data-ng-bind="group.$key"></h2>
      <li data-ng-repeat="person in group | orderBy: Sort">
        <a ng-href="{{ person.path }}"><img ng-src="{{ person.picture_thumb }}"></a>
        <div>
          <a ng-href="{{ person.path }}">
            <span data-ng-bind="person.firstName"></span>
            <span data-ng-bind="person.lastName"></span>
          </a>
        </div>
        <div data-ng-bind="person.jobTitle"></div>
      </li>
    </ul>
  </div>
</div>
