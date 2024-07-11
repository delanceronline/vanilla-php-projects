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
use TAT\Backend\Ads as ChildAds;
use TAT\Backend\AdsQuery as ChildAdsQuery;
use TAT\Backend\Map\AdsTableMap;

/**
 * Base class that represents a query for the 'ads' table.
 *
 *
 *
 * @method     ChildAdsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAdsQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildAdsQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildAdsQuery orderByCreationdate($order = Criteria::ASC) Order by the creationDate column
 * @method     ChildAdsQuery orderByEditondate($order = Criteria::ASC) Order by the editonDate column
 *
 * @method     ChildAdsQuery groupById() Group by the id column
 * @method     ChildAdsQuery groupByFilename() Group by the filename column
 * @method     ChildAdsQuery groupByUrl() Group by the url column
 * @method     ChildAdsQuery groupByCreationdate() Group by the creationDate column
 * @method     ChildAdsQuery groupByEditondate() Group by the editonDate column
 *
 * @method     ChildAdsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAds findOne(ConnectionInterface $con = null) Return the first ChildAds matching the query
 * @method     ChildAds findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAds matching the query, or a new ChildAds object populated from the query conditions when no match is found
 *
 * @method     ChildAds findOneById(int $id) Return the first ChildAds filtered by the id column
 * @method     ChildAds findOneByFilename(string $filename) Return the first ChildAds filtered by the filename column
 * @method     ChildAds findOneByUrl(string $url) Return the first ChildAds filtered by the url column
 * @method     ChildAds findOneByCreationdate(string $creationDate) Return the first ChildAds filtered by the creationDate column
 * @method     ChildAds findOneByEditondate(string $editonDate) Return the first ChildAds filtered by the editonDate column *

 * @method     ChildAds requirePk($key, ConnectionInterface $con = null) Return the ChildAds by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAds requireOne(ConnectionInterface $con = null) Return the first ChildAds matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAds requireOneById(int $id) Return the first ChildAds filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAds requireOneByFilename(string $filename) Return the first ChildAds filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAds requireOneByUrl(string $url) Return the first ChildAds filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAds requireOneByCreationdate(string $creationDate) Return the first ChildAds filtered by the creationDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAds requireOneByEditondate(string $editonDate) Return the first ChildAds filtered by the editonDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAds[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAds objects based on current ModelCriteria
 * @method     ChildAds[]|ObjectCollection findById(int $id) Return ChildAds objects filtered by the id column
 * @method     ChildAds[]|ObjectCollection findByFilename(string $filename) Return ChildAds objects filtered by the filename column
 * @method     ChildAds[]|ObjectCollection findByUrl(string $url) Return ChildAds objects filtered by the url column
 * @method     ChildAds[]|ObjectCollection findByCreationdate(string $creationDate) Return ChildAds objects filtered by the creationDate column
 * @method     ChildAds[]|ObjectCollection findByEditondate(string $editonDate) Return ChildAds objects filtered by the editonDate column
 * @method     ChildAds[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \TAT\Backend\Base\AdsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TAT\\Backend\\Ads', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdsQuery) {
            return $criteria;
        }
        $query = new ChildAdsQuery();
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
     * @return ChildAds|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAds A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, filename, url, creationDate, editonDate FROM ads WHERE id = :p0';
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
            /** @var ChildAds $obj */
            $obj = new ChildAds();
            $obj->hydrate($row);
            AdsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAds|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AdsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AdsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdsTableMap::COL_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdsTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the creationDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationdate('2011-03-14'); // WHERE creationDate = '2011-03-14'
     * $query->filterByCreationdate('now'); // WHERE creationDate = '2011-03-14'
     * $query->filterByCreationdate(array('max' => 'yesterday')); // WHERE creationDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $creationdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByCreationdate($creationdate = null, $comparison = null)
    {
        if (is_array($creationdate)) {
            $useMinMax = false;
            if (isset($creationdate['min'])) {
                $this->addUsingAlias(AdsTableMap::COL_CREATIONDATE, $creationdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationdate['max'])) {
                $this->addUsingAlias(AdsTableMap::COL_CREATIONDATE, $creationdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdsTableMap::COL_CREATIONDATE, $creationdate, $comparison);
    }

    /**
     * Filter the query on the editonDate column
     *
     * Example usage:
     * <code>
     * $query->filterByEditondate('2011-03-14'); // WHERE editonDate = '2011-03-14'
     * $query->filterByEditondate('now'); // WHERE editonDate = '2011-03-14'
     * $query->filterByEditondate(array('max' => 'yesterday')); // WHERE editonDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $editondate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function filterByEditondate($editondate = null, $comparison = null)
    {
        if (is_array($editondate)) {
            $useMinMax = false;
            if (isset($editondate['min'])) {
                $this->addUsingAlias(AdsTableMap::COL_EDITONDATE, $editondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($editondate['max'])) {
                $this->addUsingAlias(AdsTableMap::COL_EDITONDATE, $editondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdsTableMap::COL_EDITONDATE, $editondate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAds $ads Object to remove from the list of results
     *
     * @return $this|ChildAdsQuery The current query, for fluid interface
     */
    public function prune($ads = null)
    {
        if ($ads) {
            $this->addUsingAlias(AdsTableMap::COL_ID, $ads->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ads table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdsTableMap::clearInstancePool();
            AdsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdsQuery
