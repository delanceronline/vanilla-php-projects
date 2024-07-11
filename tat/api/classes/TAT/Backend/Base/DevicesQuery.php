<?php

namespace TAT\Backend\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use TAT\Backend\Devices as ChildDevices;
use TAT\Backend\DevicesQuery as ChildDevicesQuery;
use TAT\Backend\Map\DevicesTableMap;

/**
 * Base class that represents a query for the 'devices' table.
 *
 *
 *
 * @method     ChildDevicesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDevicesQuery orderByRegistrationId($order = Criteria::ASC) Order by the registration_id column
 * @method     ChildDevicesQuery orderByDeviceType($order = Criteria::ASC) Order by the device_type column
 *
 * @method     ChildDevicesQuery groupById() Group by the id column
 * @method     ChildDevicesQuery groupByRegistrationId() Group by the registration_id column
 * @method     ChildDevicesQuery groupByDeviceType() Group by the device_type column
 *
 * @method     ChildDevicesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDevicesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDevicesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDevicesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDevicesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDevicesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDevices findOne(ConnectionInterface $con = null) Return the first ChildDevices matching the query
 * @method     ChildDevices findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDevices matching the query, or a new ChildDevices object populated from the query conditions when no match is found
 *
 * @method     ChildDevices findOneById(int $id) Return the first ChildDevices filtered by the id column
 * @method     ChildDevices findOneByRegistrationId(string $registration_id) Return the first ChildDevices filtered by the registration_id column
 * @method     ChildDevices findOneByDeviceType(string $device_type) Return the first ChildDevices filtered by the device_type column *

 * @method     ChildDevices requirePk($key, ConnectionInterface $con = null) Return the ChildDevices by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDevices requireOne(ConnectionInterface $con = null) Return the first ChildDevices matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDevices requireOneById(int $id) Return the first ChildDevices filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDevices requireOneByRegistrationId(string $registration_id) Return the first ChildDevices filtered by the registration_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDevices requireOneByDeviceType(string $device_type) Return the first ChildDevices filtered by the device_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDevices[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDevices objects based on current ModelCriteria
 * @method     ChildDevices[]|ObjectCollection findById(int $id) Return ChildDevices objects filtered by the id column
 * @method     ChildDevices[]|ObjectCollection findByRegistrationId(string $registration_id) Return ChildDevices objects filtered by the registration_id column
 * @method     ChildDevices[]|ObjectCollection findByDeviceType(string $device_type) Return ChildDevices objects filtered by the device_type column
 * @method     ChildDevices[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DevicesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \TAT\Backend\Base\DevicesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TAT\\Backend\\Devices', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDevicesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDevicesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDevicesQuery) {
            return $criteria;
        }
        $query = new ChildDevicesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDevices|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DevicesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DevicesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDevices A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, registration_id, device_type FROM devices WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDevices $obj */
            $obj = new ChildDevices();
            $obj->hydrate($row);
            DevicesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDevices|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DevicesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DevicesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DevicesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DevicesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the registration_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistrationId('fooValue');   // WHERE registration_id = 'fooValue'
     * $query->filterByRegistrationId('%fooValue%'); // WHERE registration_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registrationId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function filterByRegistrationId($registrationId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registrationId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicesTableMap::COL_REGISTRATION_ID, $registrationId, $comparison);
    }

    /**
     * Filter the query on the device_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceType('fooValue');   // WHERE device_type = 'fooValue'
     * $query->filterByDeviceType('%fooValue%'); // WHERE device_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deviceType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function filterByDeviceType($deviceType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicesTableMap::COL_DEVICE_TYPE, $deviceType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDevices $devices Object to remove from the list of results
     *
     * @return $this|ChildDevicesQuery The current query, for fluid interface
     */
    public function prune($devices = null)
    {
        if ($devices) {
            $this->addUsingAlias(DevicesTableMap::COL_ID, $devices->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the devices table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DevicesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DevicesTableMap::clearInstancePool();
            DevicesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DevicesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DevicesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DevicesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DevicesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DevicesQuery
